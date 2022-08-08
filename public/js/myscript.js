const flashData = $('.alert').alert('info');
console.log(flashData);

if(flashData){
    Swal({
        title: 'Success ' + flashData,
        text: 'Data masuk broo',
        type: 'success'
    });
}