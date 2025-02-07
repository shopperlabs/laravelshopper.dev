export const toDarkMode = () => {
  localStorage.theme = 'dark'
  window.updateTheme()
}

export const toLightMode = () => {
  localStorage.theme = 'light'
  window.updateTheme()
}

window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
  if (localStorage.theme === 'system') {
    if (e.matches) {
      document.documentElement.classList.add('dark');
      document.documentElement.setAttribute('data-theme', 'dark');
    } else {
      document.documentElement.classList.remove('dark');
      document.documentElement.setAttribute('data-theme', 'light');
    }
  }

  updateThemeAndSchemeColor();
});
