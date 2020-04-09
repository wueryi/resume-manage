import React from 'react';
import Scrollspy from 'react-scrollspy';
import logo from "../layouts/image/my_square.jpg";
import 'bootstrap/dist/js/bootstrap.bundle.min';

class Nav extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            nav: ['about', 'info', 'work', 'skills',  'experience', 'education', 'evaluate']
        }
    }

    render() {
        return (
            <nav className="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
                <a className="navbar-brand js-scroll-trigger" href="#page-top">
                    <span className="d-block d-lg-none">目录</span>
                    <span className="d-none d-lg-block">
                            <img className="img-fluid img-profile rounded-circle mx-auto mb-2" src={logo}
                                 alt=""/>
                        </span>
                </a>
                <button className="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span className="navbar-toggler-icon"></span>
                </button>
                <div className="collapse navbar-collapse" id="navbarSupportedContent">
                    <Scrollspy items={this.state.nav} className="navbar-nav" currentClassName="active">
                        <li className="nav-item">
                            <a className="nav-link js-scroll-trigger" href="#about">个人简介</a>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link js-scroll-trigger" href="#info">基本信息</a>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link js-scroll-trigger" href="#work">工作经历</a>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link js-scroll-trigger" href="#skills">个人技能</a>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link js-scroll-trigger" href="#experience">项目经历</a>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link js-scroll-trigger" href="#education">教育培训</a>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link js-scroll-trigger" href="#evaluate">自我评价</a>
                        </li>
                    </Scrollspy>
                </div>
            </nav>
        );
    }
}

export default Nav;