$(document).ready(function(){
    COMPANY.load_data();
});

// data:{ [use this for POST,PUT,PATCH, DELETE]
//     _token : _TOKEN
//     _method: 'PUT'
// USED as sample if using WEB in accessing controller
// }

const COMPANY = (()=>
{ // class
    let this_data = {}; 

    // let global_id = 1; //property

    this_data.loadData = () =>
    { //methods or functions
        instance.get(``,
        {
            params: ({

            })
        }).then((response) =>
        {
            alert(1);

        }).catch((error) =>
        {

        }).finally(() =>
        {

        })
        
    };

    return this_data;
})();