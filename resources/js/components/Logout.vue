<template>
    <li class="nav-item">
        <form>
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </li>
</template>


<script>
export default {

}
</script>


<style>
    button.logout-button{
        cursor: pointer;
        background-color:inherit;
        color:teal;
        border: none;
        padding: 10px;
        line-height: 1.5;
        font-size: 1.7rem;
        font-weight: 600;
        font-family: BlinkMacSystemFont,-apple-system,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Fira Sans","Droid Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
    }
    button.logout-button:hover{
        text-decoration-line: underline;
    }
</style>