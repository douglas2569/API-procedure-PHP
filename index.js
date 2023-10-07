import { get } from "./src/lib/api/retrieve.js"
import createTableRows from "./src/lib/create_table_rows.js";

const userTable = document.querySelector('.user-table')
const data = await get("http://localhost/users/api/user/show.php")
createTableRows(data, userTable)

document.querySelector('h1').addEventListener('click',async ()=>{
  const uniquedata = await get("http://localhost/users/api/user/show.php/id/1")
  createTableRows(uniquedata, userTable)
})

/*
* Endpoints: 
     http://localhost/users/api/user/show.php
     http://localhost/users/api/user/show.php/all/password/0800fc577294c34e0b28ad2839435945
     http://localhost/users/api/user/show.php/id/1
     http://localhost/users/api/user/show.php/email/douglas2570@gmail.com
*
*/