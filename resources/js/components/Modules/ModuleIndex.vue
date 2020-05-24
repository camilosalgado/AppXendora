<template>
    <b-container fluid>
        <b-row class="mb-2">
            <b-col cols="12" class="text-right">
                <b-button v-b-modal.modal-lg variant="primary">
                    <i class="fa fa-plus"></i> Create Module
                </b-button>

                <b-modal id="modal-lg" size="lg" title="Create Module" hide-footer>
                    <b-form enctype="multipart/form-data">

                        <!--<b-form-group>
                            <b-form-select v-model="module.selectedapp" size="sm" class="mt-3">
                                <template v-slot:first>
                                    <b-form-select-option :value="null" selected disabled>&#45;&#45; Please select an option &#45;&#45;</b-form-select-option>
                                </template>
                                <b-form-select-option v-for="app in selectOptions" :key="app.id" :value="app.id">
                                    {{ app.name }}
                                </b-form-select-option>
                            </b-form-select>
                        </b-form-group>-->

                        <b-form-group id="input-group-1" label="Module Name" label-for="input-1">
                            <b-form-input id="input-1" v-model="module.name" type="text" required
                                          placeholder="Enter Module Name">
                            </b-form-input>
                        </b-form-group>
                        <b-form-group id="input-group-2" label="Module Url" label-for="input-2">
                            <b-form-input id="input-2" v-model="module.module_url" type="text" required
                                          placeholder="Enter Module Url">
                            </b-form-input>
                        </b-form-group>
                        <b-form-group id="textarea-group-1" label="Module Description" label-for="texta-1">
                            <b-form-textarea id="texta-1" v-model="module.description"
                                             placeholder="Enter Description Here..." rows="3"
                                             max-rows="6"></b-form-textarea>
                        </b-form-group>

                        <hr>

                        <b-form-group id="buttons" class="text-right">
                            <b-button variant="danger" type="reset">
                                <i class="fa fa-times"></i> Cancelar
                            </b-button>
                            <b-button variant="success" @click="saveModule">
                                <i class="fa fa-save"></i> Guardar</b-button>
                        </b-form-group>

                    </b-form>
                </b-modal>
            </b-col>
        </b-row>
        <b-row>
            <!--<b-col cols="4">
                <b-card-group deck>
                    <b-card header="Create an Application" header-tag="header">
                        <b-form enctype="multipart/form-data">

                            &lt;!&ndash;<b-form-group>
                                <b-form-select v-model="module.selectedapp" size="sm" class="mt-3">
                                    <template v-slot:first>
                                        <b-form-select-option :value="null" selected disabled>&#45;&#45; Please select an option &#45;&#45;</b-form-select-option>
                                    </template>
                                    <b-form-select-option v-for="app in selectOptions" :key="app.id" :value="app.id">
                                        {{ app.name }}
                                    </b-form-select-option>
                                </b-form-select>
                            </b-form-group>&ndash;&gt;

                            <b-form-group id="input-group-1" label="Module Name" label-for="input-1">
                                <b-form-input id="input-1" v-model="module.name" type="text" required
                                              placeholder="Enter Module Name">
                                </b-form-input>
                            </b-form-group>
                            <b-form-group id="input-group-2" label="Module Url" label-for="input-2">
                                <b-form-input id="input-2" v-model="module.module_url" type="text" required
                                              placeholder="Enter Module Url">
                                </b-form-input>
                            </b-form-group>
                            <b-form-group id="textarea-group-1" label="Module Description" label-for="texta-1">
                                <b-form-textarea id="texta-1" v-model="module.description"
                                                 placeholder="Enter Description Here..." rows="3"
                                                 max-rows="6"></b-form-textarea>
                            </b-form-group>

                            <hr>

                            <b-form-group id="buttons" class="text-right">
                                <b-button variant="danger" type="reset">
                                    <i class="fa fa-times"></i> Cancelar
                                </b-button>
                                <b-button variant="success" @click="saveModule">
                                    <i class="fa fa-save"></i> Guardar</b-button>
                            </b-form-group>

                        </b-form>
                    </b-card>
                </b-card-group>
            </b-col>-->
            <!--<b-col cols="5">
                    <b-table-simple>
                        <b-thead head-variant="dark">
                            <b-tr>
                                <b-th>Module</b-th>
                                <b-th>Url</b-th>
                                <b-th>Description</b-th>
                                <b-th>Actions</b-th>
                            </b-tr>
                        </b-thead>
                        <b-tbody>
                            <b-tr v-for="module in modules" :key="module.id">
                                <b-td>{{ module.name }}</b-td>
                                <b-td>{{ module.module_url }}</b-td>
                                <b-td>{{ module.description }}</b-td>
                                <b-td>
                                    <b-button pill variant="danger" class="float-right" title="Desactivar">
                                        <i class="fa fa-power-off"></i>
                                    </b-button>
                                </b-td>
                            </b-tr>
                        </b-tbody>
                    </b-table-simple>
            </b-col>-->
            <b-col cols="7">
                <b-card title="Card Title" no-body>
                    <b-card-header header-tag="nav">
                        <b-nav card-header tabs>
                            <b-nav-item active href="/home">Active</b-nav-item>
                            <b-nav-item>Inactive</b-nav-item>
                            <b-nav-item disabled>Disabled</b-nav-item>
                        </b-nav>
                    </b-card-header>

                    <b-card-body class="text-center">
                        <b-card-text>
                            With supporting text below as a natural lead-in to additional content.
                        </b-card-text>

                        <b-button variant="primary">Go somewhere</b-button>
                    </b-card-body>
                </b-card>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
    export default {
        name: "ModuleIndex",
        data() {
            return {
                module: {},
                modules: [],
                outlined: false,
                selectOptions: []
            }
        },
        methods: {
            fetchModules() {
                let url = "http://127.0.0.1:8000/modules/getmodules";

                axios.get(url)
                    .then(res => {
                        this.modules = res.data;
                    })
                    .catch(err => {
                        console.log(err);
                    })
            },
            fetchApps() {
                let url = "http://127.0.0.1:8000/applications/getapps";

                axios.get(url)
                    .then(res => {
                        this.selectOptions = res.data;
                    })
                    .catch(err => {
                        console.log(err);
                    })
            },
            saveModule() {
                let url = "http://127.0.0.1:8000/modules/savemodule";

                axios.post(url, this.module)
                    .then(res => {

                        if(res.status == 201) {
                            this.$bvToast.toast(`${ res.data.msg }`, {
                                title: 'Application',
                                variant: 'success',
                                toaster: 'b-toaster-bottom-right'
                            })
                        }

                        if(res.status == 200) {
                            this.$bvToast.toast(`${ res.data.msg }`, {
                                title: 'Application',
                                variant: 'danger',
                                toaster: 'b-toaster-bottom-right'
                            })
                        }

                        this.clearFields();
                        this.fetchModules();
                    })
                    .catch(err => {
                        console.log(err);
                    })
            },
            clearFields() {
                this.module.selectedapp = 'null';
                this.module.name = '';
                this.module.description = '';
                this.module.module_url = '';
            }
        },
        created() {
            this.fetchModules();
            this.fetchApps();
        }
    }
</script>

<style scoped>

</style>
