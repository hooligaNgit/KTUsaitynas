const getGifts = () => {
    axios.get('http://127.0.0.1:8000/api/gifts',{
        headers: {
            'Authorization': `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiYWY2NzYzZTY3M2U3YjI2MjhlZTVlMDZlOTY5MzcwODAxZjRmYmQ0MTYzZjhiOWYwMDIwMTAwMDQzNDE5NDg3MWY0ZjU5ZWRiOGEzNDYxZDAiLCJpYXQiOjE2NjY0ODcxMDcuMTkxNzU0LCJuYmYiOjE2NjY0ODcxMDcuMTkxNzU2LCJleHAiOjE2OTgwMjMxMDcuMTcxMDExLCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.ct470qjj4QeojUk6c6R3PIKYrm8HTiyC0qZ91iEf-_7hVHTk-agp7rvW0qGe2I96KPst3uDOGT9lt00hCl8a2jf8HBehH7cJkfQFuB9PJrx_523nvWaFP9lvGSJnGGNgxBfWITDCBSwMk32M4kFKRQM7HSOYDize_ALas7aPhQNBdVaCAKD6igtdjV4cUOa-ylgdqjDa580TmGunjXFFKZ2p-TTz5yuBZ22VvKYAB-Kro_gste330JXZvprCyWH__hS6hVXuu-608ZqZuXZ88TDu40ORamH1Y5KnRzA4hULiHQuEIY591csYthMaPuetVs8ST5xU9fftT3imjOUlFvOGxMAwTIc0BaPXid-v-qmVMu40RozwLs6PrEnlPaCjFKAnrYmDpY1YGUv9r-X27sRS6i8-w_vtH7r-tXSqfbGY5HcvkyfkK0jmv2vsDbnMLN7jreW6F_00uUwxd7mhqhjKXcGv-Afsn-7GwDMqJOQszqtsBR1gHDzubi84qszSSiJ_iu5ldT5To24wfcuSnRBx9in5S-QHqV-XDzQFXTeVZgGVf4sjCQ6iE_aM5LoWq0SzxOrF0BMANRD5PNNEJQ3e1xV_-Ax8AWXG31CL4udtJOnWDRMVRw162x9foPfCV7s6tcMlSfKFmR6tE5RfVFtT3OnFsD_O02gz99JPWvU`
        }
    })
        .then(response => {
            const gifts = response.data.data;
            console.log(gifts);
        })
        .catch(error => console.error(error));
};
getGifts();

const name = document.querySelector(".name")
const units_owned = document.querySelector(".units_owned")
const unit_price = document.querySelector(".unit_price")
const type_id = document.querySelector(".type_id")
const alert_success = document.querySelector(".alert-success")
const alert_warning = document.querySelector(".alert-warning")
axios.defaults.headers.common['Authorization'] = `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiYWY2NzYzZTY3M2U3YjI2MjhlZTVlMDZlOTY5MzcwODAxZjRmYmQ0MTYzZjhiOWYwMDIwMTAwMDQzNDE5NDg3MWY0ZjU5ZWRiOGEzNDYxZDAiLCJpYXQiOjE2NjY0ODcxMDcuMTkxNzU0LCJuYmYiOjE2NjY0ODcxMDcuMTkxNzU2LCJleHAiOjE2OTgwMjMxMDcuMTcxMDExLCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.ct470qjj4QeojUk6c6R3PIKYrm8HTiyC0qZ91iEf-_7hVHTk-agp7rvW0qGe2I96KPst3uDOGT9lt00hCl8a2jf8HBehH7cJkfQFuB9PJrx_523nvWaFP9lvGSJnGGNgxBfWITDCBSwMk32M4kFKRQM7HSOYDize_ALas7aPhQNBdVaCAKD6igtdjV4cUOa-ylgdqjDa580TmGunjXFFKZ2p-TTz5yuBZ22VvKYAB-Kro_gste330JXZvprCyWH__hS6hVXuu-608ZqZuXZ88TDu40ORamH1Y5KnRzA4hULiHQuEIY591csYthMaPuetVs8ST5xU9fftT3imjOUlFvOGxMAwTIc0BaPXid-v-qmVMu40RozwLs6PrEnlPaCjFKAnrYmDpY1YGUv9r-X27sRS6i8-w_vtH7r-tXSqfbGY5HcvkyfkK0jmv2vsDbnMLN7jreW6F_00uUwxd7mhqhjKXcGv-Afsn-7GwDMqJOQszqtsBR1gHDzubi84qszSSiJ_iu5ldT5To24wfcuSnRBx9in5S-QHqV-XDzQFXTeVZgGVf4sjCQ6iE_aM5LoWq0SzxOrF0BMANRD5PNNEJQ3e1xV_-Ax8AWXG31CL4udtJOnWDRMVRw162x9foPfCV7s6tcMlSfKFmR6tE5RfVFtT3OnFsD_O02gz99JPWvU`;
function addGifts() {
    axios.post('http://127.0.0.1:8000/api/gifts', {
            name: name.value,
            units_owned: units_owned.value,
            unit_price: unit_price.value,
            type_id: type_id.value
        })
        .then((res)=>{
            if (res.status === 201)
            {
                alert_success.classList.remove("hidden")
            }
            console.log(res.status);
        })
        .catch(function (err){
            if(err.response){
                alert_warning.classList.remove("hidden")
            }
        })
}
document.querySelectorAll('.btn--delete').forEach(el => el.addEventListener('click', function (){
    console.log("button pressed");
    console.log(items);

}));
document.getElementById('belekas').addEventListener('click', addGifts);
