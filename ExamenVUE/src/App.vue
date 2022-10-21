<template>
  <div class="main-content">
    <div style="text-align: center; color: black; font-size: 25px;"><b>Asignación de conductores y vehículos</b></div>
    <div style="margin: 15px; text-align: center;">
      <table class="table table-striped table-bordered">
        <thead style="background-color: #2C8FFE; color: white;">
          <tr>
            <th><b>Conductor</b></th>
            <th><b>Vehículo</b></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in asignacion">
            <td>{{item.nombreConductor }} {{item.apellidoConductor}}</td>
            <td>{{item.marcaVehiculo }} {{item.modeloVehiculo}}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div style="text-align: center;">
      <div>
        <b style="text-align: center; color: black; font-size: 15px; margin-right: 8%;">Lista de conductores</b>
        <b style="text-align: center; color: black; font-size: 15px; margin-left: 8%;">Lista de conductores</b>
      </div>
      <select aria-label="Default select example" style="margin: 15px; padding: 5px; width: 40%;" v-model="idConductor">
        <option v-for="item in conductores" :value="item.idConductor">{{item.nombreConductor }}
          {{item.apellidoConductor}}</option>
      </select>
      <select aria-label="Default select example" style="margin: 15px; padding: 5px; width: 40%;" v-model="idVehiculo">
        <option v-for="item in vehiculos" :value="item.idVehiculo">{{item.marcaVehiculo }} {{item.modeloVehiculo}}
        </option>
      </select>
    </div>

    <div style="text-align: center; margin-top: 15px;">
      <button type="button" class="btn btn-primary" @click=(guardarAsignacion)>Asignar</button>
    </div>

  </div>
</template>


<script>

import axios from 'axios'
import VueAxios from 'vue-axios'

export default {

  data() {
    return {
      conductores: [],
      vehiculos: [],
      asignacion: [],
      idConductor: '',
      idVehiculo: '',
    };
  },

  mounted() {
    this.obtenerConductores();
    this.obtenerVehiculo();
    this.obtenerAsignaciones();
  },

  methods: {

    guardarAsignacion() {
      axios
        .post('http://127.0.0.1:8000/api/asignacion/' + this.idConductor + '/' + this.idVehiculo)
        .then(response => {
          this.obtenerAsignaciones();
          this.obtenerConductores();
          this.obtenerVehiculo();
        })
        .catch(error => {
          console.log(error)
          this.errored = true
        })
        .finally(() => this.loading = false)
    },

    obtenerConductores() {
      axios
        .get('http://127.0.0.1:8000/api/obtener-conductores')
        .then(response => {
          this.conductores = response.data
        })
        .catch(error => {
          console.log(error)
          this.errored = true
        })
        .finally(() => this.loading = false)
    },

    obtenerVehiculo() {
      axios
        .get('http://127.0.0.1:8000/api/obtener-vehiculos')
        .then(response => {
          this.vehiculos = response.data
        })
        .catch(error => {
          console.log(error)
          this.errored = true
        })
        .finally(() => this.loading = false)
    },

    obtenerAsignaciones() {
      axios
        .get('http://127.0.0.1:8000/api/obtener-asignacion')
        .then(response => {
          this.asignacion = response.data
        })
        .catch(error => {
          console.log(error)
          this.errored = true
        })
        .finally(() => this.loading = false)
    },

  },
};
</script>