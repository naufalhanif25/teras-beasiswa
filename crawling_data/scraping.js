import chalk from "chalk";
import * as XLSX from "xlsx";
import * as cheerio from "cheerio";
import fetch from "node-fetch";
import { Chrono } from "chrono-node";
import { format } from "date-fns";

const MAX = 100;
const PERPAGE = 10;
const YEAR = 2020;
const MONTH = [
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember",
];

const ALLDATA = [];

let DATAIDX = 0;
let FINISH = false;

function toExcel(data, filename = "output.xlsx") {
    const headers = [
        "id",
        "tanggal_daftar",
        "tanggal_buka",
        "tanggal_tutup",
        "judul",
        "deskripsi",
        "kata_kunci",
        "cover",
        "url_sumber",
        "url_panduan",
    ];

    const formattedData = data.map((row) => {
        const tanggal_daftar = row[1];
        const [tanggal_buka, tanggal_tutup] = tanggal_daftar
            .split(" - ")
            .map((t) => t.trim());

        return {
            id: row[0],
            tanggal_daftar,
            tanggal_buka,
            tanggal_tutup,
            judul: row[2],
            deskripsi: row[3],
            kata_kunci: Array.isArray(row[4]) ? row[4].join(", ") : row[4],
            cover: row[5],
            url_sumber: row[6],
            url_panduan: row[7],
        };
    });

    const worksheet = XLSX.utils.json_to_sheet(formattedData, {
        header: headers,
    });
    const workbook = XLSX.utils.book_new();

    XLSX.utils.book_append_sheet(workbook, worksheet, "Data Beasiswa");
    XLSX.writeFile(workbook, filename);

    console.log(
        `[${chalk.green("EXCEL")}]\n`,
        `>> File successfully saved as ${chalk.cyan(filename)}\n`
    );
}


async function getRegLink(url) {
    try {
        const response = await fetch(url);
        const html = await response.text();
        const $ = cheerio.load(html);
        const value = $(".wp-block-button__link").attr("href");

        return value ? value : url;
    } catch {
        return url;
    }
}

function getDates(text) {
    const chrono = new Chrono();
    const results = chrono.parse(text);
    const dates = results.map((r) => r.start.date());

    if (dates.length < 2) return null;

    dates.sort((a, b) => a - b);

    const startDate = format(dates[0], "yyyy-MM-dd");
    const startDateObj = new Date(startDate);
    const endDate = format(dates[1], "yyyy-MM-dd");
    const endDateObj = new Date(endDate);

    return `${startDateObj.getDate()} ${
        MONTH[startDateObj.getMonth()]
    } ${startDateObj.getFullYear()} - ${endDateObj.getDate()} ${
        MONTH[endDateObj.getMonth()]
    } ${endDateObj.getFullYear()}`;
}

function join(initString, joinString) {
    return initString + joinString;
}

async function scraping() {
    const start = Date.now();

    for (let page = 1; page <= MAX; page++) {
        try {
            if (FINISH === true) {
                break;
            }
    
            const loopStart = Date.now();
            const APIURL = `https://beasiswa.id/wp-json/wp/v2/posts?after=${YEAR}-01-01T00:00:00&per_page=${PERPAGE}&page=${page}`;
    
            const response = await fetch(APIURL);
            const data = await response.json();
    
            for (let index = 0; index < PERPAGE; index++) {
                if (
                    data.code !== "rest_post_invalid_id" &&
                    data.code !== "rest_forbidden"
                ) {
                    let date = data[index].date.split("T")[0];
                    let source = data[index].link;
                    let doc = await getRegLink(source);
    
                    const dateObj = new Date(date);
    
                    date = `${dateObj.getDate()} ${
                        MONTH[dateObj.getMonth()]
                    } ${dateObj.getFullYear()}`;
    
                    dateObj.setDate(dateObj.getDate() + 7);
    
                    const dateWeek = `${dateObj.getDate()} ${
                        MONTH[dateObj.getMonth()]
                    } ${dateObj.getFullYear()}`;
    
                    let title = data[index].title.rendered;
                    let desc = join(
                        data[index].yoast_head_json.og_description
                            .replace("[&hellip;]", "")
                            .trim(),
                        "."
                    );
                    let keywords =
                        data[index].yoast_head_json.schema["@graph"][0].keywords;
    
                    keywords ?
                    [
                        data[index].yoast_head_json.schema["@graph"][0]
                            .articleSection,
                    ].map((data) => {
                        for (let index = 0; index < data.length; index++) {
                            keywords.push(data);
                        }
                    }) : keywords;
    
                    let image = data[index].uagb_featured_image_src.full[0];
                    image = image
                        ? image
                        : "https://t3.ftcdn.net/jpg/05/79/68/24/360_F_579682465_CBq4AWAFmFT1otwioF5X327rCjkVICyH.jpg";
                    let registDate = getDates(data[index].content.rendered);
    
                    ALLDATA.push([
                        ++DATAIDX,
                        registDate ? registDate : `${date} - ${dateWeek}`,
                        title,
                        desc,
                        keywords,
                        image,
                        source,
                        doc,
                    ]);
    
                    const loopEnd = Date.now();
    
                    console.log(
                        `[${chalk.green("SUCCESS")}: 200]\n`,
                        `>> Time remaining: ${chalk.yellow(
                            `${Math.round(
                                ((loopEnd - loopStart) / 1000) *
                                    (MAX * PERPAGE -
                                        ((page - 1) * PERPAGE + (index + 1)))
                            )}s`
                        )}\n`,
                        `>> Index: ${DATAIDX} of ${
                            MAX * PERPAGE
                        } [Page: ${page} (Remaining: ${MAX * PERPAGE} [-${
                            (page - 1) * PERPAGE + (index + 1)
                        }])]\n`,
                        `>> URL: ${chalk.cyan(`${source}`)}\n`
                    );
                } else {
                    FINISH = true;
    
                    break;
                }
            }
        }
        catch {
            continue;
        }
    }

    await toExcel(ALLDATA);

    const end = Date.now();

    console.log(
        `[${chalk.green("COMPLETE")}]\n`,
        `>> Total data: ${DATAIDX}\n`,
        `>> Execution time: ${chalk.yellow(`${(end - start) / 1000}s`)}\n`
    );
}

scraping();