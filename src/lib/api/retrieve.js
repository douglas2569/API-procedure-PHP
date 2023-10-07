const get = async function (path) {
  let response = await fetch(path)
  response = await response.json()

  return response
}

export {get}