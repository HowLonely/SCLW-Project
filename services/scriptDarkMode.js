const darkSwitch = document.getElementById('darkSwitch');
const currentTheme = localStorage.getItem('theme');

if (currentTheme) {
  document.body.setAttribute('data-bs-theme', currentTheme);
  if (currentTheme === 'dark') {
    darkSwitch.checked = true;
  }
}

darkSwitch.addEventListener('change', () => {
  if (darkSwitch.checked) {
    document.body.setAttribute('data-bs-theme', 'dark');
    localStorage.setItem('theme', 'dark');
  } else {
    document.body.setAttribute('data-bs-theme', 'light');
    localStorage.setItem('theme', 'light');
  }    
});
