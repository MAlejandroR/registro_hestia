<script>
import {Link} from '@inertiajs/inertia-vue3';
import Layout from '@/Layouts/Layout.vue';
import {reactive} from "vue";
import {ref} from "vue";

import {Inertia} from '@inertiajs/inertia'

export default {
    components: {Layout},
    props: {

        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
        msj: String,

    },
    setup() {
        const form = reactive({
            nombre: null,
            apellido: null,
            email: null,
            boton: null,
        })

        function submit() {
            var nombre = this.form;
            console.log("En submit");
            Inertia.post('datos', form);
        }

        return {form, submit}
    },
    methods: {
        async cerrar() {
            console.log('En cerrar');
            // route("main");
            Inertia.get("/");
        },



    }
}
</script>

<template>
    <h1>Valor de mensaje -{{ msj }}-</h1>
    <Layout>
        <div v-if="!msj">

            <form id=formulario method="post" @submit.prevent="submit">
                <div class="anuncio">
                    Datos para crear una cuenta en la máquina Hestia
                </div>

                class="flex-col justify-center items-center mt-10 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-1/2 md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide
                                text-gray-700 text-xs font-bold mb-2"
                               for="nombre">
                            Nombre
                        </label>
                        <input class="appearance-none block w-full bg-gray-200
                                 text-gray-700 border border-red-500
                                 rounded py-3 px-4 mb-3 leading-tight
                                  focus:outline-none focus:bg-white"
                               id="nombre" type="text" name="nombre"
                               v-model="form.nombre" placeholder="Nombre ">
                        <p class="text-red-500 text-xs italic">Campo obligatorio, por favor rellénalo.</p>
                    </div>
                    <div class="w-1/2 md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide
                                 text-gray-700 text-xs font-bold mb-2" for="apellido">
                            Apellido
                        </label>
                        <input v-model="form.apellido" class="appearance-none block w-full bg-gray-200
                                text-gray-700 border border-gray-200 rounded py-3 px-4 l
                                eading-tight focus:outline-none focus:bg-white
                                focus:border-gray-500" id="apellido" name="apellido" type="text" placeholder="Apellido">
                        <p class="text-red-500 text-xs italic">Apellido es un campo obligatorio, por favor
                            rellénalo.</p>

                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide
                                text-gray-700 text-xs font-bold mb-2"
                               for="email">
                            Correo electrónico
                        </label>
                        <input v-model="form.email" class="appearance-none block w-full
                                bg-gray-200 text-gray-700 border border-gray-200
                                 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               id="email" type="email" name="email"
                               placeholder="email">
                        <p class="text-gray-600 text-xs italic">Inserta un correo válido</p>
                    </div>

                    <div class="w-full px-3">
                        <button class="boton" type="submit">Enviar</button>

                    </div>
                </div>

            </form>
        </div>
        <div v-else class="anuncio">
            <span v-html="msj"></span>
            <div class="w-full px-3">
                <button class="boton" @click="cerrar">Cerrar</button>
            </div>
        </div>
    </Layout>

</template>
