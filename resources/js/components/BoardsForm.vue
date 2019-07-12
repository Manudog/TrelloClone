<template>
      <div class="card" style="width: 18rem;margin:0 0 1rem 1rem;">
            <div class="card-body">
                  <h4 class="mt-3 text-center" style="cursor:pointer;" @click="show=!show" >Créer un tableau</h4>
                  <form v-show="show" @submit.prevent="submitBoard">
                        <div class="form-group">
                              <label>Titre</label>
                              <input type="text" class="form-control" :class="{'is-invalid':errors.title}" v-model="form.title"/>
                              <p class="text-danger" v-if="errors.title" v-text="errors.title[0]"></p>
                        </div>
                        <div class="form-group">
                              <label>Sous-Titre</label>
                              <input type="text" class="form-control" :class="{'is-invalid':errors.sub_title}" v-model="form.sub_title"/>
                              <p class="text-danger" v-if="errors.sub_title" v-text="errors.sub_title[0]"></p>
                        </div>
                        <button type="submit" class="btn btn-lg btn-success mb-4">Valider</button>
                  </form>
            </div>
      </div>
</template>

<script>
export default {
      data() {
            return {
                  show : false,
                  form: {
                        title: '',
                        sub_title: ''
                  },
                  errors: {}
            }
      },
      methods: {
            submitBoard() {
                  axios.post('/board', this.form)
                        .then(({data}) => {
                              this.$emit('newBoard', data),
                              this.form.title = '',
                              this.form.sub_title = '',
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
