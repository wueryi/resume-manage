import React from 'react';
import Axios from "axios";
import {Host} from "../../config";

class Info extends React.Component{
    constructor(props) {
        super(props);
        this.state = {
            info: {
                mobile: {value: ""},
                sex: {value: ""},
                education: {value: ""},
                email: {value: ""},
                address: {value: ""},
                age: {value: ""},
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
            <section className="resume-section p-3 p-lg-5 d-flex flex-column" id="info">
                <div className="my-auto">
                    <h2 className="mb-5">基本信息</h2>
                    <div className="mb-5">
                        <h4>性别：{info.sex.value}</h4>
                        <h4>年龄：{info.age.value}</h4>
                        <h4>学历：{info.education.value}</h4>
                        <h4>电话：<a href={"tel:"+info.mobile.value}>{info.mobile.value}</a></h4>
                        <h4 style={ { textTransform: 'none',} }>邮箱：
                            <a href={"mailto:"+info.email.value}>{info.email.value}</a>
                        </h4>
                        <h4>家庭地址：青岛市城阳区和源路216号星雨华府</h4>
                    </div>
                </div>
            </section>
        );
    }
}

export default Info;