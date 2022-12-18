const loginApi = () => {
    axios.get('http://127.0.0.1:8000/api/login',{
        email: "rokassskry@gmail.com",
        password: "zaibas12"
    })
        .then(function (response)  {
            console.log(response)
        })
        .catch(function (error) {
            console.log(error);
        });
};
