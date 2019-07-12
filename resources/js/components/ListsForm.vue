<template>
      <div class="card" style="width: 18rem;margin:0 0 1rem 1rem;">
            <div class="card-body">
                  <h4 class="mt-3 text-center" style="cursor:pointer;" @click="show=!show" >Ajouter une liste</h4>
                  <form v-show="show" @submit.prevent="submitList">
                        <div class="form-group">
                              <label>Titre</label>
                              <input type="text" class="form-control" :class="{'is-invalid':errors.title}" v-model="form.title"/>
                              <input type="text" class="form-control" v-model="dataBoard"/>
                              <p class="text-danger" v-if="errors.title" v-text="errors.title[0]"></p>
                        </div>
                        <button type="submit" class="btn btn-lg btn-success mb-4">Valider</button>
                  </form>
            </div>
      </div>
</template>

<script>
export default {
      
      props: ['dataBoard'],

      data() {
            return {
                  show : false,
                  form: {
                        title: '',
                        dataBoard: this.dataBoard
                  },
                  errors: {}
            }
      },
      methods: {
            submitList() {
                  axios.post('/liste', this.form)
                        .then(({data}) => {
                              this.$emit('newList', data),
                              this.form.title = '',
                              this.show = false,
                              this.errors = {}
                        })
                        .catch(error => {
                              this.errors = error.response.data.errors
                        })
            }
      }
}
</script>