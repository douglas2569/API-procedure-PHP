export default function (dataList, container) {
    dataList.result.forEach(element => {
        const tr = document.createElement('tr')
        const keys = Object.keys(element)
        
        keys.forEach((key)=>{            
            const td = document.createElement("td")
            td.textContent = element[key]
            tr.appendChild(td);
        })
               
        container.appendChild(tr)
    })
}