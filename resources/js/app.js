import Focus from '@alpinejs/focus';
import docsearch from '@docsearch/js';

import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import TableOfContents from './components/table-of-contents';

window.Alpine = Alpine;

Alpine.plugin(Focus);
Alpine.plugin(TableOfContents);

docsearch({
  container: '#docsearch',
  appId: algolia_app_id,
  apiKey: algolia_search_key,
  indexName: 'laravel',
  searchParameters: {
    facetFilters: ['version:' + window.version],
  },
});

Livewire.start();
