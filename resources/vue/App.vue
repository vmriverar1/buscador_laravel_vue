<template>

    <div class="appWrapper">
        <div class="container">
            <div class="search-box">
                <input 
                    class="search-input" 
                    type="text" 
                    name="q" 
                    placeholder="Escribe una palabra"
                    v-model="query"
                    @input="search()">
                <ul 
                    class="result-list"
                    :class="resultsVisibility">
                    <li v-for="post in posts" class="result-item">
                        <a href="#" class="result-link">
                            <div class="result-title">{{ post.title }}</div>
                            <div class="result-content">{{ post.content.substr(1,40) }}</div>
                        </a>
                    </li>
                </ul>
            </div>

            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint, totam suscipit unde sequi cupiditate id modi ad repellat, aut dolor beatae distinctio ea sunt porro iste. Corrupti nemo cum quia. Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum ipsam maiores repellendus veniam voluptas eius, sit est rem animi tempora in ipsum itaque distinctio necessitatibus at ullam aperiam sapiente autem?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint, totam suscipit unde sequi cupiditate id modi ad repellat, aut dolor beatae distinctio ea sunt porro iste. Corrupti nemo cum quia. Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum ipsam maiores repellendus veniam voluptas eius, sit est rem animi tempora in ipsum itaque distinctio necessitatibus at ullam aperiam sapiente autem?

                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint, totam suscipit unde sequi cupiditate id modi ad repellat, aut dolor beatae distinctio ea sunt porro iste. Corrupti nemo cum quia. Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum ipsam maiores repellendus veniam voluptas eius, sit est rem animi tempora in ipsum itaque distinctio necessitatibus at ullam aperiam sapiente autem?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint, totam suscipit unde sequi cupiditate id modi ad repellat, aut dolor beatae distinctio ea sunt porro iste. Corrupti nemo cum quia. Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum ipsam maiores repellendus veniam voluptas eius, sit est rem animi tempora in ipsum itaque distinctio necessitatibus at ullam aperiam sapiente autem?
            </p>
        </div>
    </div>
    
</template>

<script>
// import { defineComponent } from '@vue/composition-api'

// export default defineComponent({
export default ({
    data(){
        return {
            query: '',
            posts: ''
        }
    },

    computed: {
        resultsVisibility(){
            return (this.query.length > 0 ? 'show' : 'hide')
        }
    },
    methods: {
        search(){
            if(this.query.length >= 3){
                axios.post('/posts/search',{
                    q:this.query
                }).then(res =>{
                    console.log(res.data.post);
                    this.posts = res.data.post;
                }).catch(error=>{
    
                    console.log(error.response)
                })
                console.log("Buscando")
            }
        }
    }
    // setup() {
        
    // },
})
</script>
<style>
    body{
        font-family: sans-serif;
    }

    ::-webkit-scrollbar{
        width: 10px;

    }

    ::-webkit-scrollbar-track{
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb{
        background: #888;
    }

    ::-webkit-scrollbar-thumb:hover{
        background: #555;
    }

    .container{
        padding: 30px;
    }

    .search-box{
        position: relative;
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .search-input{
        width: 600px;
        height: 30px;
        border-radius: 10px;
        border: 0px;
        background: #eeeeee;
        padding: 10px 20px;
        font-size: 18px;
        outline: none;
    }

    .result-list.show{
        position: absolute;
        width: 640px;
        max-height: 250px;
        overflow-y: auto;
        list-style: none;
        background: #fff;
        padding: 0px;
        top: 40px;
        border-radius: 10px;
        box-shadow: 1px 2px 8px 0px #b5b5b5;
    }

    .result-list.hide{
        display: none;
    }

    .result-item{
        border-bottom: 1px solid #ececec;
    }

    .result-link{
        text-decoration: none;
        color: #333;
        display: block;
        padding: 10px 15px;
    }

    .result-link:hover{
        background: #f9f9f9;
    }

    .result-title{
        font-size: 16px;
        font-weight: 600;
    }

    .result-content{
        font-size: 18px;
    }
</style>
