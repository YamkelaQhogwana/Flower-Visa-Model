document.getElementById('nameForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var name = document.getElementById('nameInput').value;
    var greeting = document.getElementById('greeting');
    greeting.textContent = 'Hello ' + name + '! Welcome to FlowerVisa Prototype. Explore our cutting-edge features, including an interactive fashion gallery, search functionality, personalized recommendations, and user-friendly navigation. The default username is proto, the default user email is proto@gmail.com and the default password is proto';
    greeting.style.display = 'block';
    document.getElementById('nameForm').style.display = 'none';
    document.getElementById('prototype-link').style.display = 'block';
  });
  