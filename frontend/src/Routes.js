import React, {Suspense, lazy} from 'react'
import {BrowserRouter as Router, Switch, Route} from 'react-router-dom'
import {CircularProgress} from '@mui/material'

const Auth = lazy(() => import("./store/view/auth"));
const Register = lazy(() => import("./store/view/register"));





const Routes = () => (
    <Router>
        <Suspense
            fallback={
                <div className="d-flex justify-content-center mt-5 pt-5">
                    <CircularProgress />
                </div>
            }
        >
            <Switch>
                <Route exact path="/" component={Auth} />
                <Route path="/login" component={Auth} />
                <Route exact path="/register" component={Register} />
            </Switch>
        </Suspense>
    </Router>
);

export default Routes;