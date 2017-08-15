function colorswitch () {

var current = document.getElementById('csspalette').innerHTML;

  if (current == 'Light Mode') {
    document.getElementById('csspalette').innerHTML = 'Dark Mode';
  }

  if (current == 'Dark Mode') {
    document.getElementById('csspalette').innerHTML = 'Light Mode';
  }
}
