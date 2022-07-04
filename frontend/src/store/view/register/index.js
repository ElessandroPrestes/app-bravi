import React from "react";
import { change, register } from "../../actions/register.action";
import { Redirect} from "react-router-dom";
import { Link } from "@mui/material";
import { useSelector, useDispatch } from "react-redux";
import Button from "@mui/material/Button";
import CssBaseline from "@mui/material/CssBaseline";
import FormControlLabel from "@mui/material/FormControlLabel";
import Checkbox from "@mui/material/Checkbox";
import Paper from "@mui/material/Paper";
import Box from "@mui/material/Box";
import Grid from "@mui/material/Grid";
import Typography from "@mui/material/Typography";
import { makeStyles } from "@mui/styles";
import { styled } from "@mui/material";
import FormControl from "@mui/material/FormControl";
import InputLabel from "@mui/material/InputLabel";
import Input from "@mui/material/Input";
import InputAdornment from "@mui/material/InputAdornment";
import IconButton from "@mui/material/IconButton";
import { MdOutlineVisibility, MdVisibilityOff } from "react-icons/md";


function Copyright() {
    return (
        <Typography variant="body2" color="textSecondary" align="center">
            {"Copyright © "}
            <Link
                href="https://www.linkedin.com/in/elessandro-prestes-macedo-278189126/"
                target="_blank"
                rel="noopener"
            >
                Elessandro
            </Link>{" "}
            {new Date().getFullYear()}
            {"."}
        </Typography>
    );
}

const useStyles = makeStyles((theme) => ({
    root: {
        height: "100vh",
        textAlign: "center",
    },
    image: {
        backgroundImage: "url(https://source.unsplash.com/random)",
        backgroundRepeat: "no-repeat",
        backgroundColor:
            theme.palette.type === "light"
                ? theme.palette.grey[50]
                : theme.palette.grey[900],
        backgroundSize: "cover",
        backgroundPosition: "center",
    },
    logo: {
        height: "12vh",
        borderRadius: "15px",
        margin: theme.spacing(0, 0, 2),
    },
    paper: {
        margin: theme.spacing(8, 4),
        display: "flex",
        flexDirection: "column",
        alignItems: "center",
    },
    form: {
        width: "100%", // Fix IE 11 issue.
        marginTop: theme.spacing(1),
    },
}));

export default function Register() {
    const classes = useStyles();
    const dispatch = useDispatch();
    const { user, error, success } = useSelector(state => state.registerReducer);

    const [values, setValues] = React.useState({
        showPassword: false,
    });
    const handleClickShowPassword = () => {
        setValues({
            ...values,
            showPassword: !values.showPassword,
        });
    };

    const handleMouseDownPassword = (event) => {
        event.preventDefault();
    };

    return (
        <Grid container component="main" className={classes.root}>
            <CssBaseline />
            <Grid item xs={false} sm={4} md={7} className={classes.image} />
            <Grid
                item
                xs={12}
                sm={8}
                md={5}
                component={Paper}
                elevation={6}
                square
            >
                <div className={classes.paper}>
                    <img
                        src="/logo150.png"
                        alt="Logo Bravi"
                        className={classes.logo}
                    />
                    <Typography component="h1" variant="h6" className="mb-2">
                        Criar Conta Grátis
                    </Typography>
                    <form className={classes.form} noValidate>
                        <FormControl
                            sx={{ m: 1, width: "75%" }}
                            variant="standard"
                        >
                            <InputLabel htmlFor="standard-adornment-email">
                                Nome
                            </InputLabel>
                            <Input
                                error={error.name && true}
                                name="name"
                                value={user.name}
                                autoFocus
                                onChange={(text) => {
                                    dispatch(
                                        change({ name: text.target.value })
                                    );
                                    if (error.name && delete error.name);
                                }}
                            />
                        </FormControl>
                        {error.name && (
                            <InputLabel className="text-danger">
                                {error.name[0]}
                            </InputLabel>
                        )}

                        <FormControl
                            sx={{ m: 1, width: "75%" }}
                            variant="standard"
                        >
                            <InputLabel htmlFor="standard-adornment-email">
                                Email
                            </InputLabel>
                            <Input
                                error={error.email && true}
                                type="email"
                                name="email"
                                autoComplete="email"
                                value={user.email}
                                onChange={(text) => {
                                    dispatch(
                                        change({ email: text.target.value })
                                    );
                                    if (error.email && delete error.email);
                                }}
                            />
                        </FormControl>
                        {error.email && (
                            <InputLabel className="text-danger">
                                {error.email[0]}
                            </InputLabel>
                        )}

                        <FormControl
                            sx={{ m: 1, width: "75%" }}
                            variant="standard"
                        >
                            <InputLabel htmlFor="standard-adornment-password">
                                Senha
                            </InputLabel>
                            <Input
                                error={error.password && true}
                                type={values.showPassword ? "text" : "password"}
                                name="password"
                                value={user.password}
                                onChange={(text) => {
                                    dispatch(
                                        change({ password: text.target.value })
                                    );
                                    if (
                                        error.password &&
                                        delete error.password
                                    );
                                }}
                                endAdornment={
                                    <InputAdornment position="end">
                                        <IconButton
                                            aria-label="toggle password visibility"
                                            onClick={handleClickShowPassword}
                                            onMouseDown={
                                                handleMouseDownPassword
                                            }
                                        >
                                            {values.showPassword ? (
                                                <MdVisibilityOff />
                                            ) : (
                                                <MdOutlineVisibility />
                                            )}
                                        </IconButton>
                                    </InputAdornment>
                                }
                            />
                        </FormControl>
                        {error.password && (
                            <InputLabel className="text-danger">
                                {error.password[0]}
                            </InputLabel>
                        )}

                        <Button
                            sx={{ width: "75%" }}
                            variant="contained"
                            size="large"
                            className="mt-4 mb-3"
                            color="success"
                            onClick={() => dispatch(register(user))}
                        >
                            Cadastrar
                        </Button>
                        {(success) && <Redirect to="/login" />}

                        <FormControlLabel
                            control={
                                <Checkbox value="remember" color="primary" />
                            }
                            label="Li e concordo com os termos de uso"
                        />

                        <div>
                            <Link
                                href="/login"
                                variant="body2"
                                className="text-info"
                            >
                                Fazer Login
                            </Link>
                        </div>

                        <Box mt={4}>
                            <Copyright />
                        </Box>
                    </form>
                </div>
            </Grid>
        </Grid>
    );
}
