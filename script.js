document.addEventListener('DOMContentLoaded', () => {
    const openSidebarBtn = document.getElementById('openSidebar');
    const closeSidebarBtn = document.getElementById('closeSidebar');
    const sidebar = document.getElementById('sidebar');

    // Open sidebar
    openSidebarBtn.addEventListener('click', () => {
        sidebar.style.left = '0';
    });

    // Close sidebar
    closeSidebarBtn.addEventListener('click', () => {
        sidebar.style.left = '-250px';
    });
});
