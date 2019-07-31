<template>
      <div>
            <div>
                  <button v-show="addCard" type="submit" class="card-add" @click="show=!show, addCard=!addCard"><i class="fas fa-plus"></i> Ajouter une carte</button>
                  <form class="form-card" v-show="show" @submit.prevent="submitCard">
                        <div class="form-group">
                              <input type="text" class="" :class="{'is-invalid':errors.title}" v-model="form.title" placeholder="Titre de la carte"/>
                              <p class="text-danger" v-if="errors.title" v-text="errors.title[0]"></p>
                              <input type="hidden" v-model="dataList"/>
                        </div>
                        <button type="submit" class="button b-green">Valider</button>
                        <i class="fas fa-times close-card" @click="show=!show, addCard=!addCard"></i>
                  </form>
            </div>
      </div>
</template>

<script>
export default {
      
      props: ['dataList'],

      data() {
            return {
                  show: false,
                  addCard: true,
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
                              this.addCard = true,
                              this.errors = {}
                        })
                        .catch(error => {
                              this.errors = error.response.data.errors
                        })
            }
      }
}
</script>