<style>
	.mdl-grid.mdl-height--100 {
		min-height: calc(100vh - 64px - 36px - 16px);
		align-items: center;
		-ms-flex-pack: center;
		height: 100px;
	}

	.mdl-grid.mdl-height--100>* {
		z-index: 1;
	}

	.mdl-height--100 {
		flex: 1 0 auto;
		display: flex;
		position: relative;
	}

	.index-container {
		min-width: 32vw;
		min-height: 30vw;
		display: flex;
		justify-content: space-between;
		flex-direction: column;
		text-align: center;
		padding: 60px;
		border: 1px solid #000000;
		border-radius: 5px;
		background-color: #2c2c2c;
		box-sizing: border-box;
		box-shadow: inset -5px -5px 5px rgba(0, 0, 0, .5), inset 5px 5px 5px rgba(255, 255, 255, .2);
	}

	.index-container h1 {
		color: #00ADEF;
	}

	.index-container p {
		color: white;
	}

	.index-container .outline {
		background-color: transparent;
		border: 2px solid #00ADEF;
		min-width: auto;
		min-width: unset;
		min-width: revert;
	}

	@media  only screen and (max-width : 480px) {

		/* Smartphone view: 2 tiles */
		.mdl-grid.mdl-height--100 {
			min-height: calc(100vh - 56px - 36px - 16px);
		}

		.index-container {
			min-width: 40vw;
			min-height: 50vw;
			padding: 20px 60px 30px 60px;
		}

		.index-container h1 {
			font-size: 40px;
		}
	}

	@media  only screen and (max-width : 650px) and (min-width : 481px) {

		/* Tablet view: 2 tiles */
		.mdl-grid.mdl-height--100 {
			min-height: calc(100vh - 56px - 36px - 16px);
		}

		.index-container {
			min-width: 40vw;
			min-height: 50vw;
		}
	}

	@media  only screen and (max-width : 1050px) and (min-width : 651px) {

		/* Small desktop / ipad view: 5 tiles */
		.mdl-grid.mdl-height--100 {
			min-height: calc(100vh - 56px - 36px - 16px);
		}

		.index-container {
			min-width: 40vw;
			min-height: 50vw;
		}
	}

	@media  only screen and (max-width : 1290px) and (min-width : 1051px) {

		/* Medium desktop: 5 tiles */
		.index-container {
			min-width: 35vw;
			min-height: 40vw;
			max-height: 40vw;
		}
	}

	@media  only screen and (min-width : 1290px) {
		.mdl-height--100 {
			padding: 0 100px;
		}
	}
</style><?php /**PATH C:\xampp\htdocs\mbdiag\CodeForIntegration\Sasikala\latest_code\Latest_code\resources\views/inc/IndexStyles.blade.php ENDPATH**/ ?>