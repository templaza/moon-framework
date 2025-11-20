class MoonFramework {
    constructor() {
        document.addEventListener('DOMContentLoaded', () => {
            alert('Hello World!');
            this.initColorMode();
        });
    }
    initColorMode() {
        const switchers = Array.from(document.querySelectorAll('.moon-color-mode .switcher'));
        let color_mode = 'light';
        const cmCookieName = 'moon-color-mode-' + TEMPLATE_HASH;
        const acm = ('; ' + document.cookie).split(`; ` + cmCookieName + `=`).pop().split(';')[0];

        if (acm === 'light') {
            switchers.forEach(s => s.checked = false);
            color_mode = 'light';
        } else if (acm === 'dark') {
            switchers.forEach(s => s.checked = true);
            color_mode = 'dark';
        } else if (MOON_COLOR_MODE === 'auto') {
            const cur_hour = new Date().getHours();
            if ((24 - cur_hour < 7) || (cur_hour < 6)) {
                color_mode = 'dark';
            }
            const checked = (color_mode === 'dark');
            switchers.forEach(s => s.checked = checked);
        } else {
            color_mode = MOON_COLOR_MODE;
        }

        document.documentElement.setAttribute('data-bs-theme', color_mode);

        switchers.forEach(s => {
            s.addEventListener('change', (e) => {
                const checked = e.target.checked;
                switchers.forEach(el => el.checked = checked);
                const mode = checked ? 'dark' : 'light';
                document.documentElement.setAttribute('data-bs-theme', mode);
                this.setCookie('astroid-color-mode-' + TEMPLATE_HASH, mode, 3);
            });
        });
    }

    setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
}
new MoonFramework();