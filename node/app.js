import express from "express";
import dotenv from "dotenv"
dotenv.config()
const app = express();

app.get('/',async (req,res)=>{
    res.send("API is Set");
    console.log("Accessed!");
})
const port= process.env.PORT;
app.listen(port,()=>{
    console.log(`Server Is Running on : http://localhost:${port}`)
})