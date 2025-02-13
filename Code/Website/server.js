const express = require('express')
const path = require('path')
const app = express()
const port = 3006

// Serve static files from a directory
app.use(express.static(path.join(__dirname, 'public')));

// Other routes
app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'public/index.html'));
});

app.listen(port, () => {
  console.log(`Server listening on port ${port}`)
})