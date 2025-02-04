import Focus from '@alpinejs/focus';
import docsearch from '@docsearch/js';

import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import TableOfContents from './components/table-of-contents';

window.Alpine = Alpine;

Alpine.plugin(Focus);
Alpine.plugin(TableOfContents);

docsearch({
  appId: '30W3AUXFJE',
  apiKey: '316f82ff975ee93965438d93552e6f00',
  container: '#docsearch',
  indexName: 'laravelshopper',
});

Livewire.start();
