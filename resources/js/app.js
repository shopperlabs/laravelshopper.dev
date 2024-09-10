import Focus from '@alpinejs/focus';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import TableOfContents from './components/table-of-contents';

window.Alpine = Alpine;

Alpine.plugin(Focus);
Alpine.plugin(TableOfContents);

Livewire.start();

document.addEventListener('DOMContentLoaded', () => {
  if (document.querySelector('#documentation')) {
    import('./docs.js');
  }
})
