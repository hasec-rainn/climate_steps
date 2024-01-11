const express = require('express')
const path = require('path')
const app = express()
const port = 3006

app.get('/', (req, res) => {
    res.sendFile('public/public.html', {root : __dirname})
    //res.sendFile('public/style.css', {root : __dirname})
    //app.use(express.static(path.join(__dirname, 'public')));
})

app.listen(port, () => {
  console.log(`Server listening on port ${port}`)
})