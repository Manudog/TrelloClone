<template>
      <div>
            <div>
                  <button type="submit" class="add_card" @click="show=!show">Ajouter une carte</button>
                  <form v-show="show" @submit.prevent="submitCard">
                        <div class="form-group">
                              <label>Titre</label>
                              <input type="text" class="form-control" :class="{'is-invalid':errors.title}" v-model="form.title"/>
                              <p class="text-danger" v-if="errors.title" v-text="errors.title[0]"></p>
                              <input type="text" class="form-control" v-model="dataList"/>
                        </div>
                        <button type="submit" class="btn btn-lg btn-success mb-4">Valider</button>
                  </form>
            </div>
      </div>
</template>

<script>
export default {
      
      props: ['dataList'],

      data() {
            return {
                  show : false,
                  form: {
                        title: '',
                        dataList: this.dataList
                  },
                  errors: {}
            }
      },
      methods: {
            submitCard() {
                  axios.post('/card', this.form)
                        .then(({data}) => {
                              this.$emit('newCard', data),
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