import { toDarkMode, toLightMode, toSystemMode } from './components/theme'

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
      e.preventDefault()

      const active = el.parentNode.classList.contains('parent');

      [...document.querySelectorAll('.sidebar ul li')].forEach(el => el.classList.remove('parent'));

      if(! active) {
        el.parentNode.classList.add('parent');
      }
    });
  });
}

setupNavCurrentLinkHandling()

window.toDarkMode = toDarkMode;
window.toLightMode = toLightMode;
window.toSystemMode = toSystemMode;
