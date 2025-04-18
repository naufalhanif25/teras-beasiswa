function togglePassword(id, toggleId) {
    const passwordField = document.getElementById(id);
    const toggleIcon = document.getElementById(toggleId);

    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleIcon.innerHTML = `
            <svg class="stroke-[var(--text-white)]" width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M17.86,18.14l-.44.32-.48.29-.51.27c-.17.08-.35.17-.54.24l-.56.22-.6.18-.63.14-.67.11-.7.07L12,20l-.73,0-.7-.07L9.9,19.8l-.63-.14-.6-.18-.56-.22c-.19-.07-.37-.16-.54-.24l-.51-.27-.48-.29-.44-.32a4.46,4.46,0,0,1-.43-.33l-.39-.34L5,17.11l-.34-.36c-.11-.13-.22-.25-.32-.38L4,16l-.27-.37-.25-.38c-.08-.12-.15-.24-.22-.36l-.21-.36-.18-.34-.16-.33-.15-.32-.12-.29c0-.09-.08-.18-.11-.27l-.09-.24c0-.08-.06-.15-.08-.22l-.06-.18a1,1,0,0,1,0-.14.76.76,0,0,1,0-.11V12l0-.07a.76.76,0,0,1,0-.11l.06-.14.08-.18c0-.07.07-.14.1-.22L2.44,11c0-.09.09-.18.14-.27l.15-.29.18-.32C3,10,3,9.93,3.1,9.81l.22-.34c.07-.12.15-.24.23-.36l.26-.36c.08-.13.18-.25.27-.38L4.37,8l.32-.37L5,7.25l.35-.36.38-.36.4-.34"></path>
                <path d="M10.14,4.2l.59-.11L11.36,4,12,4l.64,0,.63.07.59.11.58.14.55.18.53.22c.17.07.34.16.51.24l.49.27.46.29.44.32.42.33.4.34.38.36.35.36.34.38c.11.12.21.24.31.37s.2.25.3.37.19.25.27.38l.26.36c.08.12.16.24.23.36l.22.34c.06.12.13.23.19.33l.18.32.15.29c0,.09.1.18.14.27l.12.24c0,.08.07.15.1.22l.08.18.06.14a.76.76,0,0,1,0,.11L22,12v.11a.76.76,0,0,1,0,.11,1,1,0,0,1,0,.14l-.06.18c0,.07-.05.14-.08.22s-.06.16-.09.24-.07.18-.11.27l-.12.29-.15.32-.16.33-.18.34-.21.36"></path><path d="M14.83,14.83A4,4,0,0,1,9.17,9.17"></path>
                <line x1="2" y1="2" x2="22" y2="22"></line>
            </svg>
        `
    } 
    else {
        passwordField.type = 'password';
        toggleIcon.innerHTML = `
            <svg class="stroke-[var(--text-white)]" width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M2,12S5,4,12,4s10,8,10,8-2,8-10,8S2,12,2,12Z"></path>
                <circle cx="12" cy="12" r="4"></circle>
            </svg>
        `
    }
}