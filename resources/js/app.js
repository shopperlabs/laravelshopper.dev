import Alpine from 'alpinejs'
import Focus from '@alpinejs/focus'
import TableOfContents from './components/table-of-contents'

window.Alpine = Alpine

Alpine.plugin(Focus)
Alpine.plugin(TableOfContents)
Alpine.start()

document.addEventListener('DOMContentLoaded', () => {
  if (document.querySelector('#documentation')) {
    import('./docs.js')
  }
})
