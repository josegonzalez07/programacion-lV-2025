const { createApp } = Vue;

createApp({
    data() {
        return {
            alumnos: [],
            codigo: '',
            nombre: '',
            direccion: '',
            distrito: '',
            departamento: '',
            telefono: '',
            fechaNacimiento: '',
            sexo: '',
            busqueda: '',
            editando: false
        };
    },
    computed: {
        alumnosFiltrados() {
            return this.alumnos.filter(alumno =>
                alumno.nombre.toLowerCase().includes(this.busqueda.toLowerCase()) ||
                alumno.codigo.toLowerCase().includes(this.busqueda.toLowerCase())
            );
        }
    },
    methods: {
        guardarAlumno() {
            this.alumnos.push({
                codigo: this.codigo,
                nombre: this.nombre,
                direccion: this.direccion,
                distrito: this.distrito,
                departamento: this.departamento,
                telefono: this.telefono,
                fechaNacimiento: this.fechaNacimiento,
                sexo: this.sexo
            });
            this.limpiarFormulario();
        },
        verAlumno(alumno) {
            this.codigo = alumno.codigo;
            this.nombre = alumno.nombre;
            this.direccion = alumno.direccion;
            this.distrito = alumno.distrito;
            this.departamento = alumno.departamento;
            this.telefono = alumno.telefono;
            this.fechaNacimiento = alumno.fechaNacimiento;
            this.sexo = alumno.sexo;
            this.editando = true;
        },
        actualizarAlumno() {
            const index = this.alumnos.findIndex(a => a.codigo === this.codigo);
            if (index !== -1) {
                this.alumnos[index] = {
                    codigo: this.codigo,
                    nombre: this.nombre,
                    direccion: this.direccion,
                    distrito: this.distrito,
                    departamento: this.departamento,
                    telefono: this.telefono,
                    fechaNacimiento: this.fechaNacimiento,
                    sexo: this.sexo
                };
            }
            this.limpiarFormulario();
        },
        limpiarFormulario() {
            this.codigo = '';
            this.nombre = '';
            this.direccion = '';
            this.distrito = '';
            this.departamento = '';
            this.telefono = '';
            this.fechaNacimiento = '';
            this.sexo = '';
            this.editando = false;
        }
    }
}).mount('#app');
