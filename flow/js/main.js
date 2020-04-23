var app = new Vue({
  el: '#main',
  data(){
    return{
      numeroOrden :1111,
      subject:"Pago de prueba",
      amount:500,
      correoCliente:"cliente@gmail.com"
    }
  },
  methods:{
    enviarPago: function () {
      axios
      .post('payments/create.php', {
        numeroOrden: this.numeroOrden,
        subject: this.subject,
        amount: this.amount,
        correoCliente: this.correoCliente
      })
      .then(response => { window.location = response.data })
      .catch(e => { console.log(e) })
    }
  }
})
