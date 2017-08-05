function colorswitch () {

var current = document.getElementById('csspalette').innerHTML;

  if (current == 'Light Mode') {
    document.getElementById('csspalette').innerHTML = 'Dark Mode';
    document.getElementById('csslink').href = 'assets/css/dark.css';
  }

  if (current == 'Dark Mode') {
    document.getElementById('csspalette').innerHTML = 'Light Mode';
    document.getElementById('csslink').href = 'assets/css/main.css';
  }
}
