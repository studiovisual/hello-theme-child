document.addEventListener('DOMContentLoaded', () => {
  if (window.matchMedia('(max-width: 767px)').matches) {
    const menuItems = document.querySelectorAll(".sv-footer__menu .menu-item-has-children > a");

    function closeOtherSubmenus(currentSubmenu) {
      document.querySelectorAll(".sv-footer__menu .sub-menu").forEach(menu => {
        if (menu !== currentSubmenu) {
          menu.style.maxHeight = null;
          menu.previousElementSibling.classList.remove("active");
        }
      });
    }

    menuItems.forEach(item => {
      item.addEventListener("click", function (event) {
        event.preventDefault();
        const submenu = this.nextElementSibling;

        closeOtherSubmenus(submenu);

        if (submenu.style.maxHeight) {
          submenu.style.maxHeight = null;
        } else {
          submenu.style.maxHeight = submenu.scrollHeight + "px";
        }

        this.classList.toggle("active");
      });
    });
  }
});