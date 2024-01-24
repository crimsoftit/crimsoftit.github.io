
function Navbar() {
    return (
        <nav className="navbar navbar-expand-lg navbar-light">
            <div className="container">
                <a className="navbar-brand" href="#"><span className="lg_span">i-</span>Minter</a>
                <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span className="navbar-toggler-icon"></span>
                </button>

                <div className="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul className="navbar-nav ml-auto">
                        <li className="nav-item active">
                            <a className="nav-link" href="#">Home</a>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link" href="#">Features</a>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link" href="#">My Weapons</a>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link" href="#">Wagyu Games</a>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link" href="#"></a>
                        </li>
                        <li>
                            <button className="cybr-btn enableEthereumButton">
                                Connect Wallet
                                <span aria-hidden>_</span>
                                <span aria-hidden className="cybr-btn__glitch"></span>
                                <span aria-hidden className="cybr-btn__tag">R25</span>
                            </button>
                        </li>
                    </ul>
                
                </div>
                
            </div>
            
            
        </nav>
    )
}


function MainContent () {
    return (
        <div>
            <div className="banner">
                <p className='banner_p'>
                    VETERAN
                </p>
                <img className="ban_i" src="src/images/banner_img.PNG"></img>
            </div>
            <div className="grid-container">
                <div className="item2 udb1">
                    <img className="udb" src="src/images/udb.png"></img>
                </div>
                <div className="item3">
                    <h6>INTRODUCING THE WEAPONS MINTING GUIDE</h6>
                    <p>
                        Read our Medium guide and learn how minting works.
                    </p>
                </div>
                <div className="item4">
                    <button className="button">
                        <span>Read Article </span>
                    </button>
                </div>
            </div>
        </div>
        
    )
}

ReactDOM.render(
<div>
    <Navbar />
    <MainContent />
</div>,
document.getElementById("root"))

const ethereumButton = document.querySelector('.enableEthereumButton');

ethereumButton.addEventListener('click', () => {
  //Will Start the metamask extension
  ethereum.request({ method: 'eth_requestAccounts' });
});