import { toDarkMode, toLightMode } from './components/theme';

const setupNavCurrentLinkHandling = () => {
  // Can return two, one for mobile nav and one for desktop nav
  [...document.querySelectorAll('.sidebar ul')].forEach(nav => {
    const pathLength = window.location.pathname.split('/').length;
    const current = nav.querySelector('li a[href="' + (pathLength === 3 ? window.location.pathname+"/installation" : window.location.pathname) + '"]');

    if (current) {
      current.parentNode.parentNode.parentNode.classList.add('parent');
      current.parentNode.classList.add('active');
    }
  });

  [...document.querySelectorAll('.sidebar h2')].forEach(el => {
    el.addEventListener('click', (e) => {
      e.preventDefault();

      const active = el.parentNode.classList.contains('parent');

      [...document.querySelectorAll('.sidebar ul li')].forEach(el => el.classList.remove('parent'));

      if(! active) {
        el.parentNode.classList.add('parent');
      }
    });
  });
};

const addTableWrapper = () => {
  [...document.querySelectorAll('#documentation .table-wrapper')].forEach(wrapper => {
    const parentDiv = document.createElement('div');
    const table = wrapper.querySelector('table');
    wrapper.classList.add('overflow-x-auto', 'my-6', '-mx-4');
    parentDiv.setAttribute('class', 'inline-block min-w-full align-middle px-4 py-2');
    parentDiv.appendChild(table);
    wrapper.appendChild(parentDiv);
  });
};

setupNavCurrentLinkHandling();
addTableWrapper();

window.toDarkMode = toDarkMode;
window.toLightMode = toLightMode;
