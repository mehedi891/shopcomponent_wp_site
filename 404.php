<style>
    body {
  font-family: Arial, sans-serif;
  background: linear-gradient(45deg, #667eea, #764ba2);
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  margin: 0;
}

.error-container {
  text-align: center;
}

.error-heading {
  font-size: 5em;
  margin-bottom: 10px;
}

.error-message {
  font-size: 1.5em;
  margin-bottom: 20px;
}

.error-link {
  text-decoration: none;
  color: #fff;
  font-size: 1.2em;
  background-color: #764ba2;
  padding: 10px 20px;
  border-radius: 5px;
  transition: background-color 0.3s ease-in-out;
}

.error-link:hover {
  background-color: #5c3d91;
}

</style>

<div class="error-container">
    <div class="error-content">
      <h1 class="error-heading">404</h1>
      <p class="error-message">Oops! The page you are looking for does not exist.</p>
      <a href="<?php echo home_url() ?>" class="error-link">Go back to home</a>
    </div>
  </div>