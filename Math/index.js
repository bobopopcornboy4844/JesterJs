const IO = document.getElementById('nO');
const IT = document.getElementById('nT');
const IN = document.getElementById('O');
const Button = document.getElementById('y');
const anwser = document.getElemnetById('anwser');

Button.onclick = function() {
  const io = parseInt(IO.innerHtml);
  const it = parseInt(IT.innerHtml);
  const In = parseInt(IN.innerHtml);
  if(io + it == In) {
    anwser = 'yes'
  }else {
    anwser = 'No It Is '+(io+it)
  }
  IO.innerHtml = Math.floor(Math.random() * 10);
  IT.innerHtml = Math.floor(Math.random() * 10);
  IN.innerHtml = '';
}