<template>
  <div class="container py-4">
    <h2 class="mb-4 text-center">Registro de Vehículos</h2>

    <!-- Notificación -->
    <div v-if="mensaje" class="alert alert-info">{{ mensaje }}</div>

    <!-- Formulario -->
    <form @submit.prevent="guardarVehiculo" class="row g-3">
      <div class="col-md-6">
        <label>Marca</label>
        <input v-model="nuevo.marca" class="form-control" required />
      </div>
      <div class="col-md-6">
        <label>Modelo</label>
        <input v-model="nuevo.modelo" class="form-control" required />
      </div>
      <div class="col-md-4">
        <label>Año</label>
        <input type="number" v-model="nuevo.year" class="form-control" required />
      </div>
      <div class="col-md-4">
        <label>Número de Motor</label>
        <input v-model="nuevo.num_motor" class="form-control" required />
      </div>
      <div class="col-md-4">
        <label>Número de Chasis</label>
        <input v-model="nuevo.num_chasis" class="form-control" required />
      </div>
      <div class="col-12 text-end">
        <button class="btn btn-primary">Guardar Vehículo</button>
      </div>
    </form>

    <hr class="my-4" />

    <!-- Tabla de Vehículos -->
    <h4 class="mb-3">Vehículos Registrados</h4>
    <table class="table table-bordered">
      <thead class="table-secondary">
        <tr>
          <th>Marca</th>
          <th>Modelo</th>
          <th>Año</th>
          <th>Motor</th>
          <th>Chasis</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="vehiculo in vehiculos" :key="vehiculo.idVehiculo">
          <td>{{ vehiculo.marca }}</td>
          <td>{{ vehiculo.modelo }}</td>
          <td>{{ vehiculo.year }}</td>
          <td>{{ vehiculo.num_motor }}</td>
          <td>{{ vehiculo.num_chasis }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      nuevo: {
        marca: '',
        modelo: '',
        year: '',
        num_motor: '',
        num_chasis: ''
      },
      vehiculos: [],
      mensaje: ''
    };
  },
  mounted() {
    this.obtenerVehiculos();
  },
  methods: {
    validarCampos() {
      const regMarca = /^[A-Z]{3,}$/;
      const regModelo = /^[A-Za-z]{4,}$/;
      const regYear = /^[0-9]{4}$/;

      if (!regMarca.test(this.nuevo.marca)) {
        this.mensaje = 'Marca debe tener al menos 3 letras MAYÚSCULAS';
        return false;
      }
      if (!regModelo.test(this.nuevo.modelo)) {
        this.mensaje = 'Modelo debe tener al menos 4 letras';
        return false;
      }
      if (!regYear.test(this.nuevo.year)) {
        this.mensaje = 'Año debe ser un número de 4 cifras';
        return false;
      }

      return true;
    },
    guardarVehiculo() {
      if (!this.validarCampos()) return;

      fetch('http://127.0.0.1:8000/api/vehiculos', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(this.nuevo)
      })
        .then(res => res.json())
        .then(res => {
          this.mensaje = res.message;
          this.obtenerVehiculos();
          this.nuevo = { marca: '', modelo: '', year: '', num_motor: '', num_chasis: '' };
        })
        .catch(() => {
          this.mensaje = 'Error al guardar vehículo';
        });
    },
    obtenerVehiculos() {
      fetch('http://127.0.0.1:8000/api/vehiculos')
        .then(res => res.json())
        .then(data => {
          this.vehiculos = data;
        });
    }
  }
};
</script>

<style scoped>
label {
  font-weight: bold;
}
</style>
