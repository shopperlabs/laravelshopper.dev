export const toDarkMode = () => {
  localStorage.theme = 'dark'
  window.updateTheme()
}

export const toLightMode = () => {
  localStorage.theme = 'light'
  window.updateTheme()
}
