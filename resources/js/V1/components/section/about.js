import React from 'react';
import Axios from "axios";
import {Host} from "../../config";


class About extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            info: {
                name: {value: ""},
                mobile: {value: ""},
                sex: {value: ""},
                education: {value: ""},
                email: {value: ""},
                address: {value: ""},
                introduction: {value: ""},
                positional_titles: {value: ""}
            }
        };
    }

    componentWillMount() {
        const _this = this;
        Axios.get(Host + "/api/index/get-info")
            .then(function (response) {
                _this.setState({
                    info: response.data.result
                })
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    render() {
        const info = this.state.info;
        return (
            <section className="resume-section p-3 p-lg-5 d-flex d-column" id="about">
                <div className="my-auto">
                    <h1 className="mb-5">{info.name.value}</h1>
                    <h4><span className="text-primary">{info.positional_titles.value}</span></h4>
                    <h4><p className="mb-5">{info.introduction.value}</p></h4>
                    <ul className="list-inline list-social-icons mb-0">
                        <li className="list-inline-item">
                            <a href="https://file.jishuai521.com/public/JISHU_AI1.jpg" target='_blank'
                               rel="noopener noreferrer" title="微信订阅号">
			                    <span className="fa-stack fa-lg">
			                      <i className="fa fa-circle fa-stack-2x"></i>
			                      <i className="fa fa-weixin fa-stack-1x fa-inverse"></i>
			                    </span>
                            </a>
                        </li>
                        {/*<li className="list-inline-item">*/}
                        {/*<a href="https://blog.jishuai521.com/" target='_blank'  rel="noopener noreferrer" title="个人博客">*/}
                        {/*<span className="fa-stack fa-lg">*/}
                        {/*<i className="fa fa-circle fa-stack-2x"></i>*/}
                        {/*<i className="fa fa-book fa-stack-1x fa-inverse"></i>*/}
                        {/*</span>*/}
                        {/*</a>*/}
                        {/*</li>*/}
                        <li className="list-inline-item">
                            <a href="https://github.com/wueryi" target='_blank' rel="noopener noreferrer"
                               title="github">
			                    <span className="fa-stack fa-lg">
			                      <i className="fa fa-circle fa-stack-2x"></i>
			                      <i className="fa fa-github fa-stack-1x fa-inverse"></i>
			                    </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
        );
    }
}

export default About;