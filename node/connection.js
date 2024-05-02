import mysql from "mysql2";
import dotenv from "dotenv";
dotenv.config();
const pool=mysql.createPool({
    host:process.env.MYSQL_HOST,
    user:process.env.MYSQL_USER,
    password:process.env.MYSQL_PASWORD,
    database:process.env.MYSQL_DATABASE
}).promise()

async function selectNotes(){
    const result= await pool.query("SELECT * from notes");
    return result;
}
const [result] = await selectNotes();
console.log(result);