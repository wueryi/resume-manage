import React from 'react';
import Axios from "axios";
import {Host} from '../../config';

class Evaluate extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            evaluate: [],
        };
    }

    componentWillMount() {
        const _this = this;
        Axios.get(Host+"/api/index/get-evaluate")
            .then(function (response) {
                _this.setState({
                    evaluate: response.data.result
                })
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    render() {
        const evaluate = this.state.evaluate;
        return (
            <section className="resume-section p-3 p-lg-5 d-flex flex-column" id="evaluate">
                <div className="my-auto">
                    <h2 className="mb-5">自我评价</h2>
                    <ul className="fa-ul mb-0">
                        {
                            Object.keys(evaluate).map(key => {
                                return (
                                    <li key={key}>
                                        <i className="fa-li fa fa-star text-warning"/>
                                        <h5>{evaluate[key].content}</h5>
                                    </li>
                                )
                            })
                        }
                    </ul>
                </div>
            </section>
        );
    }
}

export default Evaluate;