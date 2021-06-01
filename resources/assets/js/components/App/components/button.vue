<template>
	<button class = "button-input"
			:disabled = "disabled || loading"
			:class = "{'button-input-disabled': disabled, 'button-input_blue': loading}"
			@click = "$emit('onclick')">
        <span v-if = "!loading" class = "button-input-inner">
            <span class = "button-input-inner__text">{{caption}}</span>
        </span>
        <div v-else class="lds-ring"><div></div><div></div><div></div><div></div></div>
    </button>
</template>

<script>
export default {
	name: 'custom-button',
	props: {
		loading: Boolean,
		caption: String,
		disabled: Boolean
	}
}
</script>

<style>
    .button-input {
        max-height: 38px;
        padding: 10px;
        border: 1px solid #dbdedf;
        border-radius: 3px;
        vertical-align: middle;
        color: #2e3640;
        background: #fcfcfc;
        font-size: 14px;
        line-height: 14px;
        outline: 0;
        z-index: 1;
        white-space: nowrap;
        text-decoration: none;
    }

    .button-input:hover:not(.button-input-disabled):not(.button-input_blue){
        background:#1992d5;
        color:#fff
    }

    .button-input_blue{
        border: 1px solid #4077d6;
        background: #4c8bf7;
        color: #fff;
    }

    .button-input-inner {
        display: -webkit-inline-box;
        display: inline-flex;
        -webkit-box-align: center;
        align-items: center;
        position: relative;
    }

    .button-input-disabled {
        cursor: default;
        color: #2e3640;
        opacity: .6;
    }

	.lds-ring {
		display: inline-block;
		position: relative;
		width: 80px;
		height: 80px;
	}
	.lds-ring div {
		box-sizing: border-box;
		display: block;
		position: absolute;
		width: 28px;
		height: 28px;
		margin: -4px;
		border: 3px solid #fff;
		border-radius: 50%;
		animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
		border-color: #fff transparent transparent transparent;
	}
	.lds-ring div:nth-child(1) {
	 	animation-delay: -0.45s;
	}
	.lds-ring div:nth-child(2) {
	 	animation-delay: -0.3s;
	}
	.lds-ring div:nth-child(3) {
	 	animation-delay: -0.15s;
	}
	@keyframes lds-ring {
		0% {
	    	transform: rotate(0deg);
		}
		100% {
	    	transform: rotate(360deg);
		}
	}
</style>