<template>
<div class="vue-for-loop-container">

  <div class="col-md-12 tweet-container" v-for="data in response">

    <div class="row">
        <div class="tweet-user-image col-md-2">
          <img class="img-fluid img-thumbnail" src="http://via.placeholder.com/100x100">
        </div>
    </div>

    <div class="col-md-10">

      <div class="row">

        <div class="col-md-12">
          {{data.username}}
          <br><small class="text-muted">
          {{data.created_at}}
          </small>
        </div>
        <hr>
      </div>

      <div class="col-md-12">
        <p>
          {{data.content}}
        </p>
      </div>
      <div class="col-md-12 tweet-image" v-if="data.image_path!=null">
        <img class="img-fluid img-thumbnail" :src="'/storage/'+data.image_path"></img>
      </div>
      <div class="col-md-12">
        <div class="d-inline-flex p-2">
          <button class="btn btn-outline-primary mx-3" data-toggle="modal" :data-target="'#commentModal'+ data.id">
            <span class="fa fa-comment-o"></span>
          </button>
          <button class="btn btn-outline-primary mx-3">
            <span class="fa fa-retweet"></span>
          </button>
          <button class="btn btn-outline-primary mx-3">
            <span class="fa fa-heart-o"></span>
          </button>
        </div>
      </div>

    </div>
    
    <!-- Modal -->
    <div class="modal fade" :id="'commentModal'+data.id" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="commentModalLabel">Comment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" :action="'/tweet/'+data.id+'/comment'">
          <input name="_token" :value="token" type="hidden">
            <div class="modal-body form-group">
             <textarea name="content" placeholder="Your comment here." class="form-control" rows="3" required></textarea>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-primary">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>

</div>
</template>

<script>
    export default {
        mounted() {
            var self = this;           
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              method: "POST",
              url: "/followed"
            })
            .done(function(data) {

              let mergedTweets = data.usertweets.concat(data.followingtweets);

              let test =  mergedTweets.sort(function(a,b){
                  a = new Date(a.created_at);
                  b = new Date(b.created_at);
                  return b-a;
              });
              console.log(test);
              self.response = test;
              self.token = document.head.querySelector("meta[name=csrf-token]").content;
            }).fail(function(){
               
            });

        },
        data: function(){
            return{
                token: "",
                // tasks: [
                //    {content:"lets go do task one", completed: false},
                //    {content:"lets go doafsdfe", completed: false},
                //    {content:"lets go do asdfasdf1123e", completed: true},
                //    {content:"lets go do asdfasdfssss123e", completed: false}
                // ],
                // arrs: [],
                response: {}
            }
        }
    }
</script>
