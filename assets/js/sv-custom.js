document.addEventListener('DOMContentLoaded', () => {
	if (window.matchMedia('(max-width: 1199px)').matches) {
			const header = document.querySelector('#sv-header');
			const body = document.body;
			const navCloseButton = header.querySelector('.sv-header__navClose');
			const checkbox = header.querySelector('.sv-header__checkbox');
			const backButton = header.querySelectorAll('#sv-header__back-menu');
			const menuItems = header.querySelectorAll('.menu-item-has-children > a');

			const updateBodyClass = () => {
					const isChecked = checkbox.checked;
					body.classList.toggle('body--with-checkbox-checked', isChecked);
					if (isChecked) {
							setTimeout(() => {
									window.scroll({ top: -1, left: 0, behavior: 'smooth' });
							}, 10);
					}
			};

			const resetSubmenu = () => {
					const navigation = header.querySelector('.sv-header__navigation');
					navigation.classList.remove('submenu-container--show');
			};

			backButton.forEach(button => {
					button.addEventListener('click', () => {
							const navigation = header.querySelector('.sv-header__navigation');
							navigation.classList.remove('submenu-container--show');
					});
			});

			menuItems.forEach(item => {
					item.addEventListener('click', event => {
							event.preventDefault();
							const submenu = item.nextElementSibling;
							if (submenu && submenu.classList.contains('sub-menu')) {
									const navigation = header.querySelector('.sv-header__navigation');
									navigation.classList.toggle('submenu-container--show');
							}
					});
			});

			// Eventos
			checkbox.addEventListener('change', updateBodyClass);
			navCloseButton.addEventListener('click', resetSubmenu);
	}
});
