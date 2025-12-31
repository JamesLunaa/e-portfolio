// Theme Management
const THEME_KEY = 'efms-theme';

function initTheme() {
    // Check for saved theme preference
    const savedTheme = localStorage.getItem(THEME_KEY);
    
    // Default to dark theme
    const isDark = savedTheme ? savedTheme === 'dark' : true;
    
    applyTheme(isDark);
    updateThemeButton(isDark);
}

function applyTheme(isDark) {
    const html = document.documentElement;
    const btn = document.getElementById('themeToggle');
    
    if (isDark) {
        html.classList.add('dark');
        document.body.classList.add('dark');
        localStorage.setItem(THEME_KEY, 'dark');
        if (btn) btn.textContent = '☀️ Light Mode';
    } else {
        html.classList.remove('dark');
        document.body.classList.remove('dark');
        localStorage.setItem(THEME_KEY, 'light');
        if (btn) btn.textContent = '🌙 Dark Mode';
    }
}

function toggleTheme() {
    const isDark = document.documentElement.classList.contains('dark');
    applyTheme(!isDark);
}

function updateThemeButton(isDark) {
    const btn = document.getElementById('themeToggle');
    if (btn) {
        btn.textContent = isDark ? '☀️ Light Mode' : '🌙 Dark Mode';
    }
}

// Listen for system theme changes
window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
    if (!localStorage.getItem(THEME_KEY)) {
        applyTheme(e.matches);
    }
});

// Initialize theme on page load
document.addEventListener('DOMContentLoaded', initTheme);
